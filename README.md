# Project: Advance Web


# Description
## UML



# Install
## `1. Cài đặt môi trường Laravel`

composer create-project --prefer-dist laravel/laravel MangementWeb

## `2. Cài đặt thư viện Inertia`
`composer require laravel/breeze --dev`

## `3. Database`

[schema datase](./Databse.md)

```
php artisan make:model User -mfs
php artisan make:controller StudentController --resource
php artisan make:model Student -m
php artisan make:model ClassModel
php artisan make:controller ClassModelController --resource
  
```
Tương tự cho các bảng khác

## `4. Model Factory Seeder Controller`

## `5. Hệ thống hóa cơ sở dữ liệu`

Hệ thống hóa cơ sở dữ liệu, cập nhật models, seeder, factories, controllers và requests

- Sửa đổi migration, tạo các bảng mới hoặc chỉnh sửa các bảng hiện có.
- Cập nhật models để hỗ trợ các mối quan hệ và validation.
- Tạo seeder và factories cho dữ liệu mẫu.
- Cập nhật controllers và requests để xử lý các nghiệp vụ liên quan đến dữ liệu.

# Deployment

