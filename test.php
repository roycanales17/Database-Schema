<?php

	use \Illuminate\Database\Facades\{Schema, Blueprint};
	
	require_once 'vendor/autoload.php';
	
	Schema::create( 'test', function( Blueprint $table ) {
		$table->int( 'id' )->primary()->autoIncrement();
		$table->string( 'name' )->comment( "User full name" );
		$table->string( 'email', 32 )->unique();
		$table->enum( 'is_verified', [ '1', '0' ])->comment( 'Email is verified.' );
		$table->dateTime( 'created_at' )->on_update();
	});