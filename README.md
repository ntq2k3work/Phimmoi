# Database structure
- user
    + id
    + email
    + password
    + first_name
    + last_name
    + birthday
    + address
    + avatar_url
    + gender

- roles
    + id
    + name

- permissions
    + id
    + name

- role_permission
    + id_role
    + id_permission

- categories
    + id
    + name
    + created_at
    + updated_at

- films
    + id
    + name
    + national
    + performer
    + director
    + trailer
    + avatar_img
    + poster_img
    + content
    + number_episode
    + created_at
    + updated_at

- film_category
    + id_film
    + id_category

- episode
    + id
    + id_film
    + link

- role_user
    + id_role
    + id_user

- role_permission
    + id_role
    + id_permission
