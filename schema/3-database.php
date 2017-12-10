<?php
/**
|- Database Tables
|--------------------------------------------|
|-        Users Table (users)
|--- id int PRIMARY KEY
|--- users_group_id int
|--- first_name varchar(40)
|--- last_name varchar(4)
|--- email varchar(96)
|--- password varchar(40)
|--- gender varchar(5)
|--- birthday int
|--- image varchar(50)
|--- created int
|--- status varchar(20)
|--- ip varchar(32)
|--------------------------------------------|
|-        Users Groups Table (users_groups)
|- id int PRIMARY KEY
|- name varchar(40)
|--------------------------------------------|
|-        Users Group Permissions Table (permissions)
|--- id int PRIMARY KEY
|--- users_group_id int
|--- rules text
|--------------------------------------------|
|-        Online Users Table (online_users)
|--- id int PRIMARY KEY
|--- user_id int
|--- last_activity int
|--------------------------------------------|
|-        Categories Table (categories)
|--- id int PRIMARY KEY
|--- parent_id int
|--- name varchar(96)
|--------------------------------------------|
|-        Posts Table (posts)
|--- id int PRIMARY KEY
|--- user_id int
|--- category_id int
|--- title varchar(255)
|--- details text
|--- image text
|--- tags text
|--- related_posts text
|--- views int
|--- created int
|--- status varchar(20)
|--------------------------------------------|
|-        Comments Table (comments)
|--- id int PRIMARY KEY
|--- user_id int
|--- post_id int
|--- comment text
|--- created int
|--- status varchar(20)
|--------------------------------------------|
|-        Settings Table (settings)
|--- id int PRIMARY KEY
|--- key varchar(40)
|--- value text
|--------------------------------------------|
|-        Ads Table (ads)
|--- id int PRIMARY KEY
|--- link text
|--- image text
|--- page varchar(30)
|--- start_at int
|--- end_at int
|--------------------------------------------|
|-        Contacts Table (contacts)
|--- id int PRIMARY KEY
|--- user_id int
|--- name varchar(100)
|--- email varchar(96)
|--- phone varchar(40)
|--- subject varchar(96)
|--- message text
|--------------------------------------------|
*/