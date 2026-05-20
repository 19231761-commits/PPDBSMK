Quick: run Laravel locally and access from your phone

Options:

1) Using Batch (Windows)
- Double-click `serve-local.bat` from the project root (or run in Command Prompt).
- It will detect your PC IPv4 and start `php artisan serve --host=0.0.0.0 --port=8000`.
- On your phone (same Wi‑Fi) open: http://<PC_IP>:8000

2) Using PowerShell (recommended for adding firewall rule)
- Open PowerShell as Administrator to allow firewall rule creation.
- Run: `.\
serve-local.ps1`
- It detects IP, tries to add a firewall rule for port 8000, and starts `php artisan serve`.

3) Using ngrok (public URL)
- Download ngrok from https://ngrok.com and authenticate.
- Run your local server (php artisan serve --host=0.0.0.0 --port=8000).
- In another terminal run: `ngrok http 8000` and use the provided https:// URL on your phone.

Notes & troubleshooting
- Make sure your phone and PC are on the same network.
- If your PC has multiple network adapters, the script picks the first non-APIPA IPv4.
- If pages don't load, check Windows Firewall or try running the PowerShell script as Administrator to add a rule.
- For persistent/public access, deploy to a VPS or hosting provider.
