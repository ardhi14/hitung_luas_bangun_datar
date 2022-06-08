<?php

function getData(string $filename, string $tabel = "", bool $id = false): ?array
{
    if (file_exists($filename)) {
        $data = json_decode(file_get_contents($filename), true);

        if ($id === false) {
            return $data;
        }

        switch ($tabel) {
            case 'triangle':
                $search = array_search($id, array_column($data, 'id_triangle'));
                break;
            case 'square':
                $search = array_search($id, array_column($data, 'id_square'));
                break;
            default:
                $search = array_search($id, array_column($data, 'id_circle'));
                break;
        }
        return $data[$search];
    } else {
        return null;
    }
}

function save(string $filename, string $tabel, array $data): bool
{
    try {
        $hasil = [];
        if (file_exists($filename)) {
            $hasil = getData($filename, $tabel);
        }

        $hasil[] = $data;
        file_put_contents($filename, json_encode($hasil));

        return true;
    } catch (Exception $e) {
        return false;
    }
}
