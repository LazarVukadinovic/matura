LOCALHOST materijal - XAMPP

Sajt za EN uputstvo: https://ultimatefosters.com/hosting/setup-a-virtual-host-in-windows-with-xampp-server/

Koraci:
1. Pravljenje virtuelnog hosta
  - Putanja do 'httpd-vhosts' fajla: C:\xampp\apache\conf\extra
  - Otvoriti 'httpd-vhosts.conf'
  - Prekopirati i urediti za vlastite potrebe: 

```
  <VirtualHost *:80>
      ServerAdmin webmaster@matura.com
      DocumentRoot "C:/xampp/htdocs/LazarVukadinovic/matura"
      ServerName matura.com
      ErrorLog "logs/matura.com-error.log"
      CustomLog "logs/matura.com-access.log" common
  </VirtualHost>
```

  - Sacuvati izmenjeni fajl

2. Precicom na tastaturi Windows+R otvorite Run app i prekopirajte sledecu putanju: C:\Windows\System32\drivers\etc\hosts
  - Otvorite pomocu **Visual Studio Code-a**
  - Dodajte sledecu liniju koda: 

```
127.0.0.1       matura.com
```
  - Sacuvajte komandom Ctrl+S i ako je potrebno dole desno 'Retry as Admin' pritisnuti

3. Restartovati Apache i MySQL
