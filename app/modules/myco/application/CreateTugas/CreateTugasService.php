<?php
namespace Index\Modules\MyCo\Application\CreateTugas;

use Index\Modules\MyCo\Domain\Model\Tugas;
use Index\Modules\MyCo\Domain\Repository\TugasRepository;


class CreateTugasService{
    private $tugasRepository;


    public function __construct(
        TugasRepository $tugasRepository)
    {
        $this->tugasRepository = $tugasRepository;
    }

    public function handle(Create $request) : CreateNewIdeaResponse
    {
        try {
            $tugas = Tugas::createTugas("haha","detail","timestamp","status");
            $response = $this->tugasRepository->save($tugas);

            return new CreateNewIdeaResponse($response, "Idea created successfully.");
        } catch (InvalidEmailDomainException $domainException) {
            return new CreateNewIdeaResponse($domainException, $domainException->getMessage(), 400, true);
        } catch (\Exception $exception) {
            return new CreateNewIdeaResponse($exception, $exception->getMessage(), 500, true);
        }
    }
}