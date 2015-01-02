<?php

/**
 * Class definition of ChunkRenderer
 *
 * @author Marco Stoll <marco.stoll@neuwaerts.de>
 * @version 1.0.2
 * @copyright Copyright (c) 2013, neuwaerts GmbH
 * @filesource
 */

namespace nw;

use nw\DataProviders\ChunkDataProvider;

/**
 * Class ChunkRenderer
 */
class ChunkRenderer extends \Wire {

    /**
     * Renders the chunk
     *
     * @param ChunkDataProvider $dataProvider
     * @return string
     */
    public function ___render(ChunkDataProvider $dataProvider) {

        $chunkFile = $dataProvider->getChunk();
        $chunkPath = $this->config->paths->templates . $chunkFile;

        ob_start();
        extract(array_merge($this->fuel->getArray(), $dataProvider->getArray()));
        include $chunkPath;
        $out = ob_get_contents();
        ob_end_clean();

        return $out;
    }
}
