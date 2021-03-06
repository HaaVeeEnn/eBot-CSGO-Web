<?php

/**
 * MatchsTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class MatchsTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object MatchsTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('Matchs');
    }

    public function getMatchsInProgressQuery() {
        return $this->createQuery()->where("status >= ? AND status <= ?", array(Matchs::STATUS_NOT_STARTED, Matchs::STATUS_END_MATCH))->orderBy("status ASC");
    }

    public function getZoomMatch() {
        return $this->createQuery()
                        ->where("status >= ? AND status <= ?", array(Matchs::STATUS_FIRST_SIDE, Matchs::STATUS_OT_SECOND_SIDE))
                        ->orderBy("RAND()")
                        ->fetchOne();
    }
    
    public function getRandomMatchStarted () {
        return $this->createQuery()
                        ->where("status >= ? AND status <= ?", array(Matchs::STATUS_WU_KNIFE, Matchs::STATUS_END_MATCH))
                        ->orderBy("RAND()")
                        ->fetchOne();
    }
    
    public function getMatchsArchivedQuery() {
        return $this->createQuery()->where("status = ?", Matchs::STATUS_ARCHIVE)->orderBy("id DESC");
    }

}