Kas ir izdarīts:

Pieslēgums datubāzei un datu atlasīšana ir pārcelta uz citiem failiem un ievietota klasēs, ievērojot OOP principus.

Veidojot pieslēgumu, funkcija odbc ir nomainīta uz PDO, jo jaunākās PHP versijas odbc vairs neatbalsta un PDO ir univērsāla metode, ko var izmantot pieslēdzoties dažādām SQL datubāžu sistēmām (MySQL, Ms SQL, Oracle u.c.).

Ar foreach ciklu tiek izvadītas rindas no tabulas orders un ar iekšēju foreach ciklu zem katras orders rindas tiek izvadītas attiecīgā pasūtījuma order_lines rindas ar pasūtījuma detaļām.

Kolonnā "Prioritāte" badge krāsa tiek piešķirta dinamiski, atkarībā no tā vai prioritāte ir "high" (sarkans), "mid" (dzeltens) vai "low" (zaļš). Tāpat arī kolonnā "Piegādāts %" badge krāsas tiek piešķirtas dinamiski, atkarībā no tā, cik procenti konkrētās preces ir piegādāts.


Kas neizdevās, kā arī, ko vēl vajadzētu izdarīt:

Neizdevās saskaitīt pasūtījuma kopējo summu, pēc izvadīšanas lapā. Izdevās sakaitīt pasūtījuma detaļu rindas zem katra pasūtījuma, bet neizdevās šo daudzumu izvadīt ailē "Summa kopā". Šīs abas darbības (rindu skaits, pasūtījuma kopējā summa) vislabāk būtu veikt pie pasūtījuma aizpildīšanas un šos datus ievadīt datubāzē kā "cietās" vērtības. Tas novērstu to, ka liekas darbības būtu jāveic pie datu izvadīšanas. Attiecīgi var izveidot iespēju labot atsevišķus pasūtījumus un attiecīgi ar SQL UPDATE funkciju labot daudzumus un summas datubāzē.

Ievēroju, ka kodā tiek pārbaudīts, vai lietotājs ir ielogojies, tāpēc būtu jāizveido arī login lapa, kā arī jauna datubāzes tabula ar lietotājiem.

Tāpat arī vajadzētu izveidot atsevišķas datubāzes tabulas ar precēm, pārdevējiem, klientiem.