<?php
	
	namespace Illuminate\Database\Facades;
	
	class Schema
	{
		protected const DB_NAME = 'database';
		
		static function dropIfExists( string $table ): void
		{
			echo("
				IF EXISTS ( SELECT * FROM information_schema.tables WHERE table_schema = '".self::DB_NAME."' AND table_name = '$table' )
				THEN
					DROP TABLE $table;
				END IF;"
			);
		}
		
		static function hasTable( string $table ): bool {
			echo( "SHOW TABLES LIKE '$table'" );
			return true;
		}
		
		static function create( string $table, \Closure $callback ): void
		{
			# Initialize
			$instance = new Blueprint( $table );
			$callback( $instance );
			
			# Run SQL
			echo( Builder::compile() );
		}
	}