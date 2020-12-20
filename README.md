
### Constraints

- You can't use framework apart from phpunit (already in composer.json)
- No databases. You can use repositories with a in-memory implementation.
  Feel free to change them, but be aware we're not looking for performance here.

- Users can read/write posts and edit/delete their own posts.
- Admins can also update and delete other users posts.

You can assume that when a request comes to this application, the identity of
the user has been already validated.

### Main concepts

- Community is a container of posts.
- Post can be an Article, Conversation or Question.
  Post has title (which is sometimes optional), text and type.
- User can be an Author, Moderator or Admin.
  User has username and role.
- Comment can be a reply to an Article, a Conversation or a Question.
  Comment has parent and text.

### Business constraints:

- A Post can not have a parent.
- A Conversation doesn't have a title.
- A Comment can have as parent an Article, a Conversation or a Question. Comment contains text.
- An Article can have commenting disabled.

### Known bugs

- If we update a post, we end up with a duplicated one. (Solved)
- If we disable commenting for an article, we end up deleting all comments from the article. (Solved)

### Requested features

- We would like to show the username for each post. (Done)

### Testing

You could see "ArticleControllerTest" where I have implemented a simple scenario which do the operations mentioned below:  
  * Add comment to the post
  * Disable the comments on the post while all the other comments does not deleted
  * After disabling post for comments new comments could not be added
  * Username is also showing with the post
  * Update the exiting post does not add new post 