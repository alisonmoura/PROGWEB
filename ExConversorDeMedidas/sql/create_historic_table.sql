CREATE TABLE historic(
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL UNIQUE,
    value_from INTEGER NOT NULL,
    unity_from VARCHAR NOT NULL,
    value_to INTEGER NOT NULL,
    unity_to VARCHAR NOT NULL
)