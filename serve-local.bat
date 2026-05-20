@echo off
REM Serve Laravel and print local IP for mobile access
pushd %~dp0
echo Detecting local IPv4 address...
for /f "delims=" %%i in ('powershell -NoProfile -Command "[System.Net.Dns]::GetHostEntry($env:computerName).AddressList | Where-Object { $_.AddressFamily -eq 'InterNetwork' -and -not $_.IPAddressToString.StartsWith('169') } | Select-Object -First 1 | ForEach-Object { $_.IPAddressToString }"') do set IP=%%i
if "%IP%"=="" set IP=127.0.0.1
echo Detected IP: %IP%
echo Starting Laravel server on all interfaces (0.0.0.0:8000)...
echo Open this on your phone: http://%IP%:8000
php artisan serve --host=0.0.0.0 --port=8000
pause
popd
