<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 17.03.17
 * Time: 12:26
 */

namespace App\Command;

use App\Manager\CertificateManager;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class CertificateDumpCommand extends AbstractCommand
{
    use ContainerAwareTrait;

    protected function configure()
    {
        $this
            ->setName('proxy:certificate:dump')
            ->setDescription('dump certificate to filesystem');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->pushOutputHandler($output);
        $manager = $this->container->get(CertificateManager::class);
        $manager->dumpCertificates();
        $this->popHandler();
    }
}
