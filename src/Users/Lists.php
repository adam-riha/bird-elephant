<?php

namespace Coderjerk\BirdElephant\Users;

use Coderjerk\BirdElephant\ApiBase;

class Lists extends ApiBase
{
    /**
     * Auth credentials
     *
     * @var array
     */
    protected array $credentials;

    /**
     * A Twitter handle
     *
     * @var string
     */
    protected string $username;

    public function __construct($credentials, $username)
    {
        $this->credentials = $credentials;
        $this->username = $username;
    }

    /**
     * @param string $target_list_id
     * @return object
     */
    public function follow(string $target_list_id): object
    {
        $id = $this->getUserId($this->username);
        $path = "users/{$id}/followed_lists";
        $data = [
            'list_id' => $target_list_id
        ];
        return $this->post($this->credentials, $path, null, $data, false, true);
    }

    /**
     * @param string $target_list_id
     * @return object
     */
    public function unfollow(string $target_list_id): object
    {
        $id = $this->getUserId($this->username);
        $path = "users/{$id}/followed_lists/{$target_list_id}";

        return $this->delete($this->credentials, $path, null, null, false, true);
    }

    /**
     * @param string $target_list_id
     * @return object
     */
    public function pin(string $target_list_id): object
    {
        $id = $this->getUserId($this->username);
        $path = "users/{$id}/pinned_lists";
        $data = [
            'list_id' => $target_list_id
        ];
        return $this->post($this->credentials, $path, null, $data, false, true);
    }

    /**
     * @param string $target_list_id
     * @return object
     */
    public function unpin(string $target_list_id): object
    {
        $id = $this->getUserId($this->username);
        $path = "users/{$id}/pinned_lists/{$target_list_id}";

        return $this->delete($this->credentials, $path, null, null, false, true);
    }
}
