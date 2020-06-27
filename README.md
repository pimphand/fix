# AnimalCare
application for consultation to the veterinarian or to buy products from stores that have been provided

## Generate Key
```shell
php artisan key:generate
```
## Install Database And Passport
```shell
php artisan migrate:refresh --seed
php artisan passport:install
```
## User
- Role
    - 0: Admin
    - 1: Doctor
    - 2: Store
    - 3: User
- Status
    - 0: New Member
    - 1: Active Member
    - 2: Suspend
- Delete
    - 0: Active
    - 1: Temporary Delete
    - 2: Permanent Delete (Delete Using Crone Daily)
## Order
- Status
    - 0: Order
    - 1: Delivery
    - 2: Receive
    - 3: Cancel
## Diagnosis
- Status
    - 0: Wait
    - 1: Approved
    - 2: Cancel
## OrderPackage
- Status
    - 0: Wait
    - 1: Approved
    - 2: Cancel