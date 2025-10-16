<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of users
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Update user role (promote to admin or demote to user)
     * 
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateRole(Request $request, User $user)
    {
        // Validate role
        $request->validate([
            'role' => ['required', Rule::in(['admin', 'user'])],
        ]);
        
        // Không cho phép tự thay đổi role của chính mình
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Bạn không thể thay đổi quyền của chính mình!');
        }
        
        $user->update(['role' => $request->role]);
        
        return back()->with('success', 'Quyền người dùng đã được cập nhật!');
    }

    /**
     * Remove the specified user
     * 
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        // Không cho phép xóa chính mình
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Bạn không thể xóa tài khoản của chính mình!');
        }
        
        $user->delete();
        
        return back()->with('success', 'Người dùng đã được xóa!');
    }
}
