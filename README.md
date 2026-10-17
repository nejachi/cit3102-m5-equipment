# Chenggay's Kitchenette: Equipment Inventory API

**Course:** CIT 3102 Midterms Activity 2
**Solo:** Partner Sanchez, Neil John S.
**Section:** your IT1E
**Resource chosen:** `Equipment`, the catering equipment inventory of Chenggay's Kitchenette (cooking, serving, tableware, drinks, storage and event setup items).

## Resource fields

| Field            | Type                                                         |
|------------------|--------------------------------------------------------------|
| name             | string                                                       |
| category         | string (cooking, serving, tableware, drinks, storage, setup) |
| quantity         | integer                                                      |
| unit_cost        | decimal                                                      |
| condition        | string (new, good, fair, needs_repair)                       |
| storage_location | string                                                       |

## Setup

```bash
git clone https://github.com/<username>/cit3102-m5-equipment.git
cd cit3102-m5-equipment
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite    
php artisan migrate
php artisan db:seed --class=EquipmentSeeder   
php artisan serve
```

The API runs at `http://127.0.0.1:8000/api`.

## Routes

| Verb | Path                         | What it does                                                                   |Token|
|------|------------------------------|--------------------------------------------------------------------------------|---|
| POST | /api/register                | Create a new user                                                              | No  |
| POST | /api/login                   | Log in and receive a token                                                     | No  |
| POST | /api/logout                  | Revoke the current token                                                       | Yes |
| GET  | /api/me                      | Show the logged-in user                                                        | Yes |
| GET  | /api/equipment               | List equipment (filter by `category`, `condition`, `storage_location`, `name`) | Yes |
| POST | /api/equipment               | Add an equipment item                                                          | Yes |
| GET  | /api/equipment/{equipment}   | Show one item                                                                  | Yes |
| PUT  | /api/equipment/{equipment}   | Update an item                                                                 | Yes |
| DELETE | /api/equipment/{equipment} | Delete an item                                                                 | Yes |

## Screenshots

1. Register (201): 01.png
2. Login (200): 02.png
3. GET /api/equipment, no token (401): 03.png
4. GET /api/equipment, with token (200): 04.png
5. POST /api/equipment, valid data (201): 05.png
6. POST /api/equipment, missing required field (422): 06.png
7. GET /api/equipment/1 (200): 07.png
8. GET /api/equipment/99999 (404): 08.png
9. PUT /api/equipment/1 (200): 09.png
10. DELETE /api/equipment/1 (204): 10.png

## Why does DELETE return 204 and not 200?

204 means "no data" the request completed and the item is deleted there is nothing left to send back to the body. 200 need to carry response unlike 204 is just directly deleting it. because in 200 data still exist and 204 the data is gone look at PUT it shows 200 because the data is still there, but it is changed
