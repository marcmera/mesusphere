<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SidebarNavigation extends Component
{

    public function render()
    {
        $userRole = Auth::check() ? Auth::user()->role : null; //Obtén el rol del usuario actual, si está autenticado
        return view('livewire.sidebar-navigation', [
            // Utiliza el rol del usuario
            'isTeacher' => $userRole === 'teacher',
            'isAdmin' => $userRole === 'admin',
            'isStudent' => $userRole === 'student',
            'isParent' => $userRole === 'parent',
            'isPsychologist' => $userRole === 'psychologist',
        ]);
    }
}
