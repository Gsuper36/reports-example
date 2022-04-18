<?php

namespace Reporting\DataSets;

/**
 * @template T
 */
interface DataSet
{
    /**
     * @return Schema
     */
    public function schema(): Schema;

    /**
     * Возвращает результаты выборки данных
     * по объекту схемы, если схема содержит
     * невалидные поля, то кидает ошибку
     * @todo Класс для ошибки
     *
     * @throws Exception
     * @return array<int,T>
     */
    public function data(Schema $schema): array;
}
