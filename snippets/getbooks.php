<?php

# https://docs.hardcover.app/api/graphql/schemas/books/

// |status_id|Meaning|
// |1|“to read” / want to read|
// |2|“currently reading”|
// |3|“finished / read”|
// |4|“on hold” / paused|
// |5|“dropped” / abandoned|

$query = <<<GQL
query {
  me {
    user_books(
      where: { status_id: { _eq: $shelf_filter } }  # status 3 = “read” books
      order_by: { date_added: desc }
      limit: $limit
    ) { 
        book {
            id
            title
            subtitle
            pages
            release_date
            slug

            contributions(distinct_on: author_id) {
                author { name }
            }

            default_cover_edition {
                image {
                    url
                    width
                    height
                }
            }
            
      }
    }
  }
}
GQL;