<?php

class m140214_142037_intraocular_instruments extends CDbMigration
{
	public function up()
	{
		$this->execute("insert into ophcocataractreferral_instrument (id,name,display_order) values (1,'Goldmann',10)");
		$this->execute("insert into ophcocataractreferral_instrument (id,name,display_order) values (2,'I-care',30)");
		$this->execute("insert into ophcocataractreferral_instrument (id,name,display_order) values (3,'Perkins',40)");
		$this->execute("insert into ophcocataractreferral_instrument (id,name,display_order) values (4,'Other',1000)");
		$this->execute("insert into ophcocataractreferral_instrument (id,name,display_order) values (5,'Dynamic Contour Tonometry',50)");
	}

	public function down()
	{
		$this->execute("delete from ophcocataractreferral_instrument");
	}

}