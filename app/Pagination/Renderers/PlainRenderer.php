<?php

namespace App\Pagination\Renderers;

use App\Pagination\Renderers\RendererAbstract;

class PlainRenderer extends RendererAbstract
{
    /**
     * Undocumented function
     *
     * @param array $extra
     * @return void
     */
    public function render(array $extra = [])
    {
        $iterator = $this->pages();

        $html = '<ul>';

        if ($iterator->hasPrevious()) {
            $html .= '<li>
                <a href="' . $this->query($this->meta->page - 1, $extra) . '">Previous</a>
            </li>';
        }

        foreach ($iterator as $page) {
            if ($iterator->isCurrentPage()) {
                $html .= '<li>
                    <strong><a href="' . $this->query($page, $extra) . '">' . $page . '</a></strong>
                </li>';
            } else {
                $html .= '<li>
                    <a href="' . $this->query($page, $extra) . '">' . $page . '</a>
                </li>';
            }
        }

        if ($iterator->hasNext()) {
            $html .= '<li>
                <a href="' . $this->query($this->meta->page + 1, $extra) . '">Next</a>
            </li>';
        }

        $html .= '</ul>';

        return $html;
    }

    /**
     * Undocumented function
     *
     * @param [type] $page
     * @param array $extra
     * @return string
     */
    protected function query($page, array $extra = [])
    {
        if (!empty($extra)) {
            return '?page=' . $page . '&' . http_build_query($extra);
        }

        return '?page=' . $page;
    }
}