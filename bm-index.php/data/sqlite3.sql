CREATE TABLE "posts" (
	"id"	TEXT UNIQUE,
	"author"	TEXT,
	"title"	TEXT,
	"description"	TEXT,
	"date"	TEXT,
	"story"	TEXT
);
CREATE TABLE "users" (
	"username"	TEXT UNIQUE,
	"name"	TEXT,
	"photo"	TEXT,
	"description"	TEXT,
	"website"	TEXT,
	"password_code"	TEXT UNIQUE,
	"password"	TEXT
);