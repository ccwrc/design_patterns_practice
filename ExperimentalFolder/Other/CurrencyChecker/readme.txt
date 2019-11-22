Napisz klasę CurrencyChecker mającej na celu pobieranie kursów walut z określonego dnia. Dane powinny być pobierane
z tabeli kursów walut A korzystając z udostępnionego przez NBP interfejsu API (api.nbp.pl).

Przy realizacji tego zadania proszę wykorzystać:
- Mechanizm interfejsów
- Mechanizm wyjątków (jeśli zaistnieje taka potrzeba)

Klasa jednocześnie powinna umożliwiać cache'owanie danych na poziomie samej klasy, aby ograniczyć ilość zapytań jeśli
dla danego dnia posiadamy już pobrane dane.

Metoda pobierania danych jest dowolna.
