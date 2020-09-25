alter table todo_item
	add constraint todo_item_user_id_fk
		foreign key (nombre_user) references user (username)
