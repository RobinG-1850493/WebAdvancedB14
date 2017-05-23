<?php

namespace view;

interface View
{
    public function show(array $data);
    public function showAll(array $data);
}
