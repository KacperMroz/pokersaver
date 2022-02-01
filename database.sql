create table users
(
    id       serial
        constraint users_pk
            primary key,
    username varchar(100) not null,
    email    varchar(255) not null,
    password varchar(255) not null
);

alter table users
    owner to wqfwiwgjfxhpjf;

create unique index users_id_uindex
    on users (id);

create table notes
(
    id          serial
        constraint notes_pk
            primary key,
    title       varchar(100),
    description text,
    user_id     integer not null
        constraint notes_users_id_fk
            references users
            on update cascade on delete cascade
);

alter table notes
    owner to wqfwiwgjfxhpjf;

create unique index notes_id_uindex
    on notes (id);

create table session
(
    id       serial
        constraint session_pk
            primary key,
    user_id  integer           not null
        constraint session_users_id_fk
            references users
            on update cascade on delete cascade,
    title    varchar(50)       not null,
    buyin    integer           not null,
    cashout  integer default 0 not null,
    result   integer           not null,
    duration double precision
);

alter table session
    owner to wqfwiwgjfxhpjf;

create unique index session_id_uindex
    on session (id);


