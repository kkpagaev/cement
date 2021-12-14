<?php

namespace common\services\one_c;

interface Bridgeable1C
{
    function getModelType(): int;
    function getModelId();
    function getModelData(): array;
}