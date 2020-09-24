create table todo_item
(
    id         int auto_increment
        primary key,
    title      text       null,
    done       tinyint(1) null,
    created_at datetime   null
);
