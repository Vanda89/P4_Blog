<?php

namespace P4blog\Utils;

use P4blog\Models\UserModel;

abstract class User
{
    /**
     * isConnected.
     */
    public static function isConnected(): bool
    {
        return
            // Si l'utilisateur est connecté
    array_key_exists('connected-user', $_SESSION) &&
            // Si l'utilisateur en session est un objet
    is_object($_SESSION['connected-user']);
    }

    /**
     * getConnectedUser.
     */
    public static function getConnectedUser()
    {
        return $_SESSION['connected-user'];
    }

    /**
     * connect.
     *
     * @param UserModel $userModel
     */
    public static function connect(UserModel $userModel): bool
    {
        // Ajoute le UserModel du user connecté en SESSION
        $_SESSION['connected-user'] = $userModel;

        return true;
    }

    /**
     * disconnect.
     */
    public static function disconnect()
    {
        // Je vérifié déjà qu'il y ait un user connecté
        if (self::isConnected()) {
            // On supprime le user en SESSION
            unset($_SESSION['connected-user']);
        }
    }

    /**
     * isAdmin.
     */
    public static function isAdmin(): bool
    {
        if (array_key_exists('connected-user', $_SESSION) && is_object($_SESSION['connected-user'])) {
            return (self::getConnectedUser()->getIsAdmin() == 1) ? true : false;
        } else {
            return false;
        }
    }
}
