# Database Schema

Install the bundle using Composer:

```
composer require roy404/schema
```

# SQL Builder (Schema) Documentation

## Introduction

The SQL Builder (Schema) class provides a fluent interface for building and managing database schemas using PHP. It allows you to define tables, columns, indexes, and other schema elements in a programmatic way.

## Usage

```php
use Illuminate\Database\Facades\Schema;
use Illuminate\Database\Facades\Blueprint;

Schema::create('users', function (Blueprint $table) {
    $table->id( 'id' );
    $table->string('name');
    $table->dateTime( 'created_at' );
});
```

## Dropping Tables

To drop an existing table, use the Schema::dropIfExists method and pass the table name:

```php 
Schema::dropIfExists('users');
```

## Checking Table Existence

To check if a table exists, use the Schema::hasTable method and pass the table name:

```php
if (Schema::hasTable('users')) {
    // Table exists
} else {
    // Table does not exist
}
```

## Column Types

- `tinyInt`: A very small integer.
- `smallInt`: A small integer.
- `mediumInt`: A medium-sized integer.
- `bigInt`: A large integer.
- `int`: An integer.
- `decimal`: A fixed-point number with a specified number of digits before and after the decimal point.
- `float`: A floating-point number.
- `double`: A double-precision floating-point number.
- `string`: A variable-length string.
- `enum`: A enumeration, which is a list of string values.
- `blob`: A binary large object, for storing large binary data.
- `text`: A text string, for storing long text data.
- `timestamp`: A timestamp, for storing a date and time.
- `date`: A date.
- `dateTime`: A date and time.
- `time`: A time.
- `year`: A year.

## Column Modifiers

- `autoIncrement`: Makes the column an auto-incrementing primary key.
- `primary`: Marks the column as a primary key.
- `unique`: Marks the column as having a unique constraint.
- `index`: Creates an index on the column.
- `binary`: Marks the column as binary (for binary data).
- `unsigned`: Marks the column as unsigned (for non-negative integers).
- `on_update`: Sets the column to update to the current timestamp on update.
- `current_date`: Sets the column's default value to the current timestamp.
- `default`: Sets a default value for the column.
- `nullable`: Allows the column to contain NULL values.
- `comment`: Adds a comment to the column.
- `collation`: Sets the collation for the column.

## Example

Here's an example of creating a table with some columns:

```php
Schema::create( 'test', function( Blueprint $table ) {
    $table->int( 'id' )->primary()->autoIncrement();
    $table->string( 'name' )->comment( "User full name" );
    $table->string( 'email', 32 )->unique();
    $table->enum( 'is_verified', [ '1', '0' ])->comment( 'Email is verified.' );
    $table->dateTime( 'created_at' )->on_update();
});
```

## Conclusion

The SQL Builder (Schema) class provides a powerful way to define and manage database schemas in your PHP applications. It simplifies the process of creating and modifying tables, columns, and indexes, allowing you to focus on building your application's logic.
