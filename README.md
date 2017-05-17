# [EN] - Reader CSV in PHP
Class PHP for reader CSV files

Include "src/pcs/read-csv/PcsReadCsv.php" in your project and use the class "PcsReadCsv()" in your script.

## Quick installation
```bash
composer require pcs/read-csv
```

### Example usage (PHP):
return table:
```php
$csv = new PcsReadCsv($file_csv);

$csv->print_table();

```

return array:
```php
$csv = new PcsReadCsv($file_csv);

$csv->read();

```

## Do you Like!
Give me a coffee: https://www.paypal.me/pasqualecs
Thank you =)

***

# [IT] - Leggi i files CSV
Classe PHP per leggere i files CSV.

Includere il file "src/pcs/read-csv/PcsReadCsv.php" net tuo progetto e usare la classe "PcsReadCsv()" nel tuo script.

## Installazione rapida
```bash
composer require pcs/read-csv
```

### Esempio per l'uso (PHP):
restituisce una tabella:
```php
$csv = new PcsReadCsv($file_csv);

$csv->print_table();

```

restituisce un array:
```php
$csv = new PcsReadCsv($file_csv);

$csv->read();

```

## Ti Piace!
Mi offri un caffè: https://www.paypal.me/pasqualecs
Grazie =)
