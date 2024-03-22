<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JefeDeTurno;
use Illuminate\Auth\Access\HandlesAuthorization;

class JefeDeTurnoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any jefes de turno.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        // Aquí puedes poner la lógica para determinar si un usuario puede ver cualquier jefe de turno
        // Por ejemplo, podrías permitir que los administradores vean todos los jefes de turno
        return $user->isAdmin(); // Suponiendo que tienes un método isAdmin en tu modelo User
    }

    /**
     * Determine whether the user can view the jefe de turno.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\JefeDeTurno  $jefeDeTurno
     * @return mixed
     */
    public function view(User $user, JefeDeTurno $jefeDeTurno)
    {
        // Aquí puedes poner la lógica para determinar si un usuario puede ver un jefe de turno específico
        // Por ejemplo, podrías permitir que un jefe de turno vea su propio perfil
        return $user->rpe === $jefeDeTurno->rpe;
    }
}
