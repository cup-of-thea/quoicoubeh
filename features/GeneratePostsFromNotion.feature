Feature: Generate Posts From Notion
  As an admin
  I want to be able to import posts from Notion
  In order to use Notion as a Back Office

  Scenario: Save posts into the database
    Given the following posts exist in Notion:
      | title  | slug   |
      | Post 1 | post-1 |
      | Post 2 | post-2 |
      | Post 3 | post-3 |
    When I run the command to import posts
    Then I should have the following posts:
      | title  |
      | Post 2 |
      | Post 3 |
      | Post 1 |