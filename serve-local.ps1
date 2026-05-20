# PowerShell helper to run Laravel locally and show LAN URL
# Run from project root: .\serve-local.ps1
$scriptPath = Split-Path -Parent $MyInvocation.MyCommand.Definition
nSet-Location $scriptPath
$ipObj = [System.Net.Dns]::GetHostEntry($env:COMPUTERNAME).AddressList | Where-Object { $_.AddressFamily -eq 'InterNetwork' -and -not $_.IPAddressToString.StartsWith('169') } | Select-Object -First 1
$ip = if ($ipObj) { $ipObj.IPAddressToString } else { '127.0.0.1' }
Write-Host "Detected IP: $ip" -ForegroundColor Cyan
Write-Host "Starting Laravel server: http://$ip:8000" -ForegroundColor Green
# Add firewall rule if running as admin
n$principal = New-Object Security.Principal.WindowsPrincipal([Security.Principal.WindowsIdentity]::GetCurrent())
if ($principal.IsInRole([Security.Principal.WindowsBuiltinRole]::Administrator)) {
    Write-Host "Adding firewall rule for port 8000 (if not present)" -ForegroundColor Yellow
    try {
        New-NetFirewallRule -DisplayName "Laravel8000" -Direction Inbound -Action Allow -Protocol TCP -LocalPort 8000 -Profile Any -ErrorAction Stop | Out-Null
        Write-Host "Firewall rule added." -ForegroundColor Green
    } catch {
        Write-Host "Firewall rule exists or could not be added: $_" -ForegroundColor DarkYellow
    }
} else {
    Write-Host "Not running as Administrator — firewall rule not added. Run PowerShell as Admin to add it automatically." -ForegroundColor Yellow
}
# Run artisan serve (this will block the script window)
php artisan serve --host=0.0.0.0 --port=8000
