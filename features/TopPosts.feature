Feature: Top Posts
  In order to read the most likes posts
  As a guest
  I want to see the top posts

  Scenario: Top Posts
    Given the following posts with likes exist:
      | title  | likes |
      | Post 1 | 10    |
      | Post 2 | 30    |
      | Post 3 | 20    |
    When I get the most liked posts
    Then I should have the following most liked posts:
      | title  |
      | Post 2 |
      | Post 3 |
      | Post 1 |