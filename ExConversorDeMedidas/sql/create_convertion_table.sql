CREATE TABLE convertion(
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL UNIQUE,
    unity_from VARCHAR NOT NULL,
    unity_to VARCHAR NOT NULL,
    convertion_value DECIMAL NOT NULL
)