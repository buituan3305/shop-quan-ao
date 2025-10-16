@echo off
echo Syncing storage files...
xcopy "d:\QuanAo\shop-quan-ao\storage\app\public" "d:\QuanAo\shop-quan-ao\public\storage" /E /I /Y /D
echo Done!
pause
