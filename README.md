# PWMv1
Instrukcja do instalacji:
<ol>
<li> Pobrać/sklonować repozytorium<br/></li>
<li> Wykonać polecenie<br> <code>composer install</code> (w przypadku braku composera zainstalować go)</li>
<li> Wykonać polecenie istalacji kontenerów <br><code>docker-compose build</code> (jeżeli docker nie znajduję się w naszym systemie należy go doinstalować)</li>
<li> Następnie wystartować kontenery za pomocą<br> <code>docker-compose up -d</code></li>
<li> W pliku <code>app/.env</code> należy ustawić prawidłowe dostępy do bazy danych tak aby zgadzały się ze wzorem:</li>
<code>DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name</code>
<li> Jeżeli chcemy wypełnić naszą bazę przykładowymi danymi należy wykonać dodatkowo w bashu<br> <code>docker-compose exec php bash</code> wywołać komendę<br> <code>bin/console doctrine:fixtures:load</code> </li>
</ol>