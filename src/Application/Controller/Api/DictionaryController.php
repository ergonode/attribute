<?php

/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See license.txt for license details.
 */

declare(strict_types = 1);

namespace Ergonode\Attribute\Application\Controller\Api;

use Ergonode\Core\Application\Controller\AbstractApiController;
use Ergonode\Attribute\Domain\Provider\Dictionary\AttributeTypeDictionaryProvider;
use Ergonode\Attribute\Domain\Query\AttributeGroupQueryInterface;
use Ergonode\Core\Domain\ValueObject\Language;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;

/**
 * Class DictionaryController
 */
class DictionaryController extends AbstractApiController
{
    /**
     * @var AttributeTypeDictionaryProvider
     */
    private $attributeTypeDictionaryProvider;

    /**
     * @var AttributeGroupQueryInterface
     */
    private $attributeGroupQuery;

    /**
     * @param AttributeTypeDictionaryProvider $attributeTypeDictionaryProvider
     * @param AttributeGroupQueryInterface    $attributeGroupQuery
     */
    public function __construct(
        AttributeTypeDictionaryProvider $attributeTypeDictionaryProvider,
        AttributeGroupQueryInterface $attributeGroupQuery
    ) {
        $this->attributeTypeDictionaryProvider = $attributeTypeDictionaryProvider;
        $this->attributeGroupQuery = $attributeGroupQuery;
    }

    /**
     * @Route("/attributes/types", methods={"GET"})
     *
     * @SWG\Tag(name="Dictionary")
     *
     *  @SWG\Parameter(
     *     name="language",
     *     in="path",
     *     type="string",
     *     required=true,
     *     default="EN",
     *     description="Language Code",
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns collection attribute types",
     * )
     * @SWG\Response(
     *     response=404,
     *     description="Not found",
     * )
     *
     * @param Language $language
     *
     * @return Response
     */
    public function getAttributeTypes(Language $language): Response
    {
        $types = $this->attributeTypeDictionaryProvider->getDictionary($language);

        return $this->createRestResponse($types);
    }

    /**
     * @Route("/attributes/groups", methods={"GET"})
     *
     * @SWG\Tag(name="Dictionary")
     *
     *  @SWG\Parameter(
     *     name="language",
     *     in="path",
     *     type="string",
     *     required=true,
     *     default="EN",
     *     description="Language Code",
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns collection attribute groups",
     * )
     * @SWG\Response(
     *     response=404,
     *     description="Not found",
     * )
     *
     * @return Response
     */
    public function getAttributeGroups(): Response
    {
        $types = $this->attributeGroupQuery->getAttributeGroups();

        return $this->createRestResponse($types);
    }
}
