<?php

namespace Projects\Gavio\Controller;

class Logout implements RequisitionHandlerInterface
{

    public function handle(): void
    {
        session_destroy();
        header('Location: /login');
    }
}