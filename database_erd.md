# Movie Application ERD and Schema

## Entity Relationship Diagram (ERD)

```mermaid
erDiagram
    users {
        bigint id PK
        varchar name
        varchar email UK
        timestamp email_verified_at "nullable"
        varchar password
        varchar remember_token "nullable"
        timestamp created_at
        timestamp updated_at
    }

    profiles {
        bigint id PK
        bigint user_id FK "UK, references users(id)"
        varchar phone
        varchar address "nullable"
        timestamp created_at
        timestamp updated_at
    }

    categories {
        bigint id PK
        varchar name "indexed"
        varchar slug UK
        timestamp created_at
        timestamp updated_at
    }

    genres {
        bigint id PK
        varchar name
        varchar slug UK
        timestamp created_at
        timestamp updated_at
    }

    casts {
        bigint id PK
        varchar name
        varchar slug UK
        timestamp created_at
        timestamp updated_at
    }

    movies {
        bigint id PK
        varchar title
        varchar title_japanese
        varchar slug UK
        text description
        text description_id
        date release_date
        varchar image
        timestamp created_at
        timestamp updated_at
    }

    ratings {
        bigint id PK
        bigint user_id FK "references users(id)"
        bigint movie_id FK "references movies(id)"
        int rating "default 0"
        text review "nullable"
        timestamp created_at
        timestamp updated_at
    }

    category_movie {
        bigint id PK
        bigint category_id FK "references categories(id)"
        bigint movie_id FK "references movies(id)"
        timestamp created_at
        timestamp updated_at
    }

    movie_genre {
        bigint id PK
        bigint movie_id FK "references movies(id)"
        bigint genre_id FK "references genres(id)"
        timestamp created_at
        timestamp updated_at
    }

    movie_cast {
        bigint id PK
        bigint movie_id FK "references movies(id)"
        bigint cast_id FK "references casts(id)"
        timestamp created_at
        timestamp updated_at
    }

    users ||--o| profiles : "has one"
    users ||--o{ ratings : "gives"
    movies ||--o{ ratings : "receives"
    movies }o--o{ categories : "has (via category_movie)"
    movies }o--o{ genres : "has (via movie_genre)"
    movies }o--o{ casts : "features (via movie_cast)"
```

## Detailed Schema Breakdown

*   **`users` Table**
    *   `id`: BIGINT (Primary Key, Auto Increment)
    *   `name`: VARCHAR
    *   `email`: VARCHAR (Unique)
    *   `email_verified_at`: TIMESTAMP (Nullable)
    *   `password`: VARCHAR
    *   `remember_token`: VARCHAR(100) (Nullable)
    *   `created_at`: TIMESTAMP (Nullable)
    *   `updated_at`: TIMESTAMP (Nullable)

*   **`profiles` Table**
    *   `id`: BIGINT (Primary Key, Auto Increment)
    *   `user_id`: BIGINT (Unsigned, Unique, Foreign Key references `users.id`, ON DELETE CASCADE)
    *   `phone`: VARCHAR
    *   `address`: VARCHAR (Nullable)
    *   `created_at`: TIMESTAMP (Nullable)
    *   `updated_at`: TIMESTAMP (Nullable)

*   **`categories` Table**
    *   `id`: BIGINT (Primary Key, Auto Increment)
    *   `name`: VARCHAR(100) (Indexed)
    *   `slug`: VARCHAR (Unique)
    *   `created_at`: TIMESTAMP (Nullable)
    *   `updated_at`: TIMESTAMP (Nullable)

*   **`genres` Table**
    *   `id`: BIGINT (Primary Key, Auto Increment)
    *   `name`: VARCHAR
    *   `slug`: VARCHAR (Unique)
    *   `created_at`: TIMESTAMP (Nullable)
    *   `updated_at`: TIMESTAMP (Nullable)

*   **`casts` Table**
    *   `id`: BIGINT (Primary Key, Auto Increment)
    *   `name`: VARCHAR
    *   `slug`: VARCHAR (Unique)
    *   `created_at`: TIMESTAMP (Nullable)
    *   `updated_at`: TIMESTAMP (Nullable)

*   **`movies` Table**
    *   `id`: BIGINT (Primary Key, Auto Increment)
    *   `title`: VARCHAR
    *   `title_japanese`: VARCHAR
    *   `slug`: VARCHAR (Unique)
    *   `description`: TEXT
    *   `description_id`: TEXT
    *   `release_date`: DATE
    *   `image`: VARCHAR
    *   `created_at`: TIMESTAMP (Nullable)
    *   `updated_at`: TIMESTAMP (Nullable)

*   **`ratings` Table**
    *   `id`: BIGINT (Primary Key, Auto Increment)
    *   `user_id`: BIGINT (Unsigned, Foreign Key references `users.id`, ON DELETE CASCADE)
    *   `movie_id`: BIGINT (Unsigned, Foreign Key references `movies.id`, ON DELETE CASCADE)
    *   `rating`: INTEGER (Default: 0)
    *   `review`: TEXT (Nullable)
    *   `created_at`: TIMESTAMP (Nullable)
    *   `updated_at`: TIMESTAMP (Nullable)

*   **`category_movie` Table** (Pivot Table)
    *   `id`: BIGINT (Primary Key, Auto Increment)
    *   `category_id`: BIGINT (Unsigned, Foreign Key references `categories.id`, ON DELETE CASCADE)
    *   `movie_id`: BIGINT (Unsigned, Foreign Key references `movies.id`, ON DELETE CASCADE)
    *   `created_at`: TIMESTAMP (Nullable)
    *   `updated_at`: TIMESTAMP (Nullable)

*   **`movie_genre` Table** (Pivot Table)
    *   `id`: BIGINT (Primary Key, Auto Increment)
    *   `movie_id`: BIGINT (Unsigned, Foreign Key references `movies.id`, ON DELETE CASCADE)
    *   `genre_id`: BIGINT (Unsigned, Foreign Key references `genres.id`, ON DELETE CASCADE)
    *   `created_at`: TIMESTAMP (Nullable)
    *   `updated_at`: TIMESTAMP (Nullable)

*   **`movie_cast` Table** (Pivot Table)
    *   `id`: BIGINT (Primary Key, Auto Increment)
    *   `movie_id`: BIGINT (Unsigned, Foreign Key references `movies.id`, ON DELETE CASCADE)
    *   `cast_id`: BIGINT (Unsigned, Foreign Key references `casts.id`, ON DELETE CASCADE)
    *   `created_at`: TIMESTAMP (Nullable)
    *   `updated_at`: TIMESTAMP (Nullable)