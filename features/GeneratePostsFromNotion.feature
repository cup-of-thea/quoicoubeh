Feature: Generate Posts From Notion
  As an admin
  I want to be able to import posts from Notion
  In order to use Notion as a Back Office

  Scenario: Save posts into the database
    Given the following posts exist in Notion:
      | title  | date       |
      | Post 1 | 2021-01-01 |
      | Post 2 | 2021-01-02 |
      | Post 3 | 2021-01-03 |
    When I run the command to import posts
    Then I should have the following posts:
      | title  | slug   | date       |
      | Post 3 | post-3 | 2021-01-03 |
      | Post 2 | post-2 | 2021-01-02 |
      | Post 1 | post-1 | 2021-01-01 |


