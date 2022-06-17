<?php

namespace App\Tests\Controller;

use App\Entity\Tag;
use App\Repository\TagRepository;
use App\Tests\WebBaseTestCase;
use DateTime;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;

class TagControllerTest extends WebBaseTestCase
{

    private TagRepository $repository;
    private string $path = '/tag';

    protected function setUp(): void
    {
        $this->httpClient = static::createClient();
        $this->repository = (static::getContainer()->get('doctrine'))->getRepository(Tag::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

//    public function testIndex(): void
//    {
//        $this->httpClient->request('GET', $this->path);
//
//        self::assertResponseStatusCodeSame(200);
//        self::assertPageTitleContains('login');
//
//        // Use the $crawler to perform additional assertions e.g.
//        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
//    }
//
//    public function testNew(): void
//    {
//        $originalNumObjectsInRepository = count($this->repository->findAll());
//
//        $this->httpClient->request('GET', sprintf('%snew', $this->path));
//
//        self::assertResponseStatusCodeSame(302);
//
//        $this->httpClient->submitForm('Save', [
//            'tag[name]' => 'Testing',
//            'tag[createdAt]' => new DateTime('now'),
//            'tag[updatedAt]' => new DateTime('now'),
//        ]);
//
//
//        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
//    }
//
//    public function testShow(): void
//    {
//        $fixture = new Tag();
//        $fixture->setName('My Title');
//        $fixture->setCreatedAt(new DateTime('now'));
//        $fixture->setUpdatedAt(new DateTime('now'));
//
//        $this->repository->add($fixture, true);
//
//        $this->httpClient->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
//
//        self::assertResponseStatusCodeSame(200);
//        self::assertPageTitleContains('Tag');
//
//        // Use assertions to check that the properties are properly displayed.
//    }
//
//    public function testEdit(): void
//    {
//        $fixture = new Tag();
//        $fixture->setName('My Title');
//        $fixture->setCreatedAt(new DateTime('now'));
//        $fixture->setUpdatedAt(new DateTime('now'));
//
//        $this->repository->add($fixture, true);
//
//        $this->httpClient->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));
//
//        $this->httpClient->submitForm('Update', [
//            'tag[name]' => 'Something New',
//            'tag[createdAt]' => new DateTime('now'),
//            'tag[updatedAt]' => new DateTime('now'),
//        ]);
//
//
//        $fixture = $this->repository->findAll();
//
//        self::assertSame('My Title', $fixture[0]->getName());
//    }

    public function testRemove(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Tag();
        $fixture->setName('My Title');
        $fixture->setCreatedAt(new DateTime('now'));
        $fixture->setUpdatedAt(new DateTime('now'));

        $this->repository->add($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->httpClient->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
    }
}
