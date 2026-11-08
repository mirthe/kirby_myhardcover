<?php

# https://docs.hardcover.app/api/graphql/schemas/books/

// |status_id|Meaning|
// |1|“to read” / want to read|
// |2|“currently reading”|
// |3|“finished / read”|
// |4|“on hold” / paused|
// |5|“dropped” / abandoned|

$order_by = $shelf_filter === 2
    ? 'first_started_reading_date: desc_nulls_last'
    : 'last_read_date: desc_nulls_last';
$query_limit = $query_limit ?? $limit;

$query = <<<GQL
query {
  me {
    user_books(
      where: { status_id: { _eq: $shelf_filter } }
      order_by: { $order_by }
      limit: $query_limit
    ) {
        first_started_reading_date
        date_added
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