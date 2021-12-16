<?php

namespace App\Classes;

trait Paginate
{
    protected $perpage;
    private $totalRecords;
    private $maxLinks = 4;

    private function currentPage(){
        $page = filter_input(INPUT_GET,'page', FILTER_SANITIZE_STRING);

        return $page ?? 1;
    }

    public function offset(){
        return ($this->currentPage() * $this->perpage) -  $this->perpage;
    }

    private function totalRecords(){
        $bind = $this->pdoStatement;
        $bind->execute();
        return $bind->rowCount();
    }

    public function totalPages(){
        return ceil($this->totalRecords() / $this->perpage);
    }

    public function sqlPaginate(){
        return " limit {$this->perpage} offset {$this->offset()}";
    }

    private function link(){
        $url = new Url();
        $link = '?page=';

        //localhost:8888/noticia?page=
        return $url->getUrl().$link;
    }

    private function preview(){
        $links ='';
        if($this->currentPage() != 1):
            $preview = ($this->currentPage() - 1);
            $links .= '<li><a href="'.$this->link().'1">[1]</a></li>';
            $links .= '<li><a href="'.$this->link(). $preview. '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';

        endif;
    }

    private function next(){
        $links ='';
        if($this->currentPage() != $this->totalPages()):
            $next = ($this->currentPage() - 1);
            $links .= '<li><a href="'.$this->link(). $next. '" aria-label="next"><span aria-hidden="true">&raquo;</span></a></li>';
            $links .= '<li><a href="'.$this->link().$this->totalPages().'">['.$this->totalPages().']</a></li>';

        endif;
    }

    private function showLinks($i){
        $class = ($i == $this->currentPage()) ? "actual" : "";
        echo $i;
        if($i > 0 && $i <= $this->totalPages()):
            $v = $i;
//            return '<li><a href="'.$this->link(). $i. '" class="'.$class.'">$v</a></li>';
            return "<li><a title=\"Página {$i}\" href=\"{$this->link()}{$i}\" class=\"{$class}\">{$i}</a></li>";;
        endif;
    }

    public function links(){
        if($this->totalPages() > 0){

           $links = '<ul class="pagination">';
           $links .= $this->preview();

           for ($i = $this->currentPage() - $this->maxLinks; $i<$this->currentPage() + $this->maxLinks; $i++):
               $links.= $this->showLinks($i);
           endfor;

            $links .= $this->next();
            $links .= '</ul>';

            return $links;
        }
    }
}