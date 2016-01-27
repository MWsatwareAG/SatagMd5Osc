md5osc password encoder
=======================
This plugin is intended for Shopware 4.3+. It enables Shopware to validate passwords that are encoded with osCommerce 2.x


Instructions in German
======================

Um gesalzene Passworte in Form MD5:SALT ( z.B. b786b40d6a3f3bba2c2c3cfd41055b50:3b ) von osCommerce 2.x in 
Shopware 4.3.0 – 4.3.6 & 5.0.0 – 5.1.2 zur Kundenanmeldung nutzen zu können, müssen Sie die Kunden mit dem kostenlosen
[Shopware Import/Export Plugin](http://store.shopware.com/swagef36a3f0ee25/shopware-import/export.html) importieren.

Hier die notwendigen Schritte
-----------------------------

* [satware Plugin satagMd5Osc](http://store.shopware.com/satag38820190538/oscommerce-kompatible-passwortvalidierung-md5-salt.html) installieren/aktivieren
* [Shopware Import/Export Plugin](http://store.shopware.com/swagef36a3f0ee25/shopware-import/export.html) installieren/aktivieren
* Cache leeren
* Im Shopware Backend `Inhalte` => `Import/Export Advanced` starten
* Neues Profil anlegen, Type: Customers, mit beliebigem Bezeichner
* CSV Datei mit Kunden wie im [Beispielformat](Testdaten/demoimport.csv) hochladen, wichtig ist die Spalte `encoder` mit dem Wert `md5osc`
  
  
Funktionstest
-------------
Sie können zunächst einfach die Testdaten importieren, der Benutzername ist `max@mustermann.de` und das Kennwort lautet `secret`. 
Wenn Sie sich mit diesen Daten im Frontend anmelden können, funktioniert die Passwortvalidierung.

Abschliessende Information
--------------------------
Shopware aktualisiert die Passworthashes der ersten Anmeldung, sofern Sie in den Grundeinstellungen => System => Passwörter den Punkt
Live Migration: Ja eingestellt haben. Bitte verwenden Sie diesen Encoder nicht für die Kodierung als Passwort-Algorithmus sondern nur
für die Migration.