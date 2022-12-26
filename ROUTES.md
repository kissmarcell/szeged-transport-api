## /findstation

### Kérés
| Név  | Leírás                                        | Érték    | Kötelező              | Alapértelmezett | Megjegyzés                                       |
|------|-----------------------------------------------|----------|-----------------------|-----------------|--------------------------------------------------|
| id   | A keresett állomás azonosítója                | `int`    | igen (vagy `station`) | -               | Nem használható együtt a `station` paraméterrel. |
| name | A keresett állomás neve (vagy annak részlete) | `string` | igen (vagy `id`)      | -               | Nem használható együtt az `id` paraméterrel.     |

### Válasz
| Név           | Leírás                                  | Érték     | Példa          |
|---------------|-----------------------------------------|-----------|----------------|
| id            | Az állomás azonosítója                  | `int`     | `520`          |
| name          | Az állomás neve                         | `string`  | `Európa liget` |
| latitude      | Az állomás pozíciójának szélességi foka | `string`  | `46.2327795`   |
| longitude     | Az állomás pozíciójának hosszúsági foka | `string`  | `20.15111`     |
| accessibility | Ismeretlen paraméter                    | `boolean` | `true`         |

## /schedule

### Kérés
| Név      | Leírás                                     | Érték        | Kötelező | Alapértelmezett  | Megjegyzés                                                        |
|----------|--------------------------------------------|--------------|----------|------------------|-------------------------------------------------------------------|
| id       | A keresett állomás azonosítója             | `int`        | igen     | -                | -                                                                 |
| arriving | Az `érkező` vagy `induló` járatok keresése | `0`/`1`      | nem      | `0`              | `0` esetén az induló, `1` esetén az érkező járatokat adja vissza. |
| date     | Megadott dátumtól való keresés             | `yyyy-mm-dd` | nem      | aktuális dátum\* | -                                                                 |
| time     | Megadott időponttól való keresés           | `hh:mm:ss`   | nem      | aktuális idő\*   | -                                                                 |
*aktuális dátum és idő = magyarországi időszámítás szerint 

### Válasz
| Név       | Leírás                     | Érték      | Példa              |
|-----------|----------------------------|------------|--------------------|
| id        | A járat azonosítója        | int        | `3478574`          |
| line      | A vonal száma              | string     | `72A`              |
| delay     | Késés mértéke percben      | int        | `4`                |
| time      | Érkezés az adott állomásra | string     | `2022-12-11 13:22` |
| direction | Célállomás                 | string     | `Európa liget`     |
| lowfloor  | Alacsonypadlós járat       | int: `0` \ | `1`                | `0`

## /journey

### Kérés
| Név | Leírás | Érték | Kötelező | Alapértelmezett | Megjegyzés |
|-----|--------|-------|----------|-----------------|------------|