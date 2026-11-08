# Kirby Plugin: MyHardcover

This plugin allows you to show recent posts for a Hardcover.app account on your Kirby site

## Git submodule

```
git submodule add https://github.com/mirthe/kirby_myhardcover site/plugins/myhardcover
```

## Usage

Add your hardcover API key and account number to your config

    'hardcover.apiKey'  => 'xxx'

Include the snippet to display your books on a page

    <?php snippet('hardcover-books-read'); ?>

The read books are ordered by the most recent date you finished reading them.

The currently reading list is ordered by the most recently started book first. Ties, including books without a start date, are broken by when they were added to the library. It shows up to 30 books with titles, authors, release dates, and page counts by default. Pass a limit to show fewer. Use the compact variant to show covers only:

    <?php snippet('hardcover-books-currently-reading', ['limit' => 3 ]) ?>
    <?php snippet('hardcover-books-currently-reading-compact', ['limit' => 4 ]) ?>

## Example 

<img src="example.png" alt="Example of books read">

## Todo

- Offer as an official Kirby plugin
- Add translations for labels
- Add sample SCSS to this readme
- Cleanup code
- Lots..
