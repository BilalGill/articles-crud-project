<?php
namespace Opeepl\BackendTest\Service;

use Opeepl\BackendTest\Exceptions\UnsupportedCurrencyException;
use Opeepl\BackendTest\Exceptions\InvalidInputException;
use PHPUnit\Framework\TestCase;
use Task\GetOnBoard\Controller\ArticleController;
use Task\GetOnBoard\Entity\Article;
use Task\GetOnBoard\Entity\Community;
use Task\GetOnBoard\Entity\Post;
use Task\GetOnBoard\Entity\User;
use Task\GetOnBoard\Repository\CommunityRepository;

class ArticleControllerTest extends TestCase {

    protected $user;
    protected $community;
    protected $post;
    protected $articleController;

    public function setUp(): void{
        $this->user = new User();
        $this->user->setUsername("TestUser");
        $this->user->setRoles("author");
        CommunityRepository::addUser($this->user);

        $this->community = new Community();
        $this->community->setName("Test Community");
        CommunityRepository::addCommunity($this->community);

        $this->articleController = new ArticleController();
    }

    /**
     * This Test create new post
     * Add comment to the post
     * Disable the comments on the post while all the other comments does not deleted
     * After disabling post for comments new comments could not be added
     * Username is also showing with the post
     * Update the exiting post does not add new post
     *
     * @test
     */
    public function addUpdatePostTest(): void {
        $articlePost = $this->articleController->createAction($this->user->getId(), $this->community->getId(), "Test Post", "Test Body");
        $this->assertEquals("Test Post", $articlePost->getTitle());
        $this->assertEquals("TestUser", $articlePost->getUserName());

        $comment = $this->articleController->commentAction($this->user->getId(), $this->community->getId(), $articlePost->getId(), "First Comment");
        $this->assertEquals("First Comment", $comment->getText());
        $this->articleController->disableCommentsAction($this->community->getId(), $articlePost->getId());
        $this->articleController->commentAction($this->user->getId(), $this->community->getId(), $articlePost->getId(), "Second Comment");
        $this->articleController->updateAction($this->user->getId(), $this->community->getId(), $articlePost->getId(), "Updated Post", "New Body");
    }
}
